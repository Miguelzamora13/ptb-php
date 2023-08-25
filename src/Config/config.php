<?php

/**
 * This file is part of the PTB-PHP (Procedural Telegram Bot - PHP) library, which provides an easy way to interact with the Telegram BOT API using Procedural programming in PHP.
 *
 * The PTB library is distributed under the terms of the GNU General Public License and is free to use, modify, and redistribute.
 * 
 * Please note that as the developer of the PTB-PHP library, I do not make any guarantees about its performance or functionality. The library may contain bugs or errors in any version.
 * 
 * It is important to thoroughly test the library and ensure its compatibility with your specific use case before deploying it in a production environment.
 * 
 * By using the PTB-PHP library, you acknowledge that you are fully responsible for its usage and any consequences that may arise from it.
 *
 * If you encounter any issues or have any questions about the library, please feel free to contact me.
 *
 * For more information about the PTB-PHP library, please visit its GitHub page.
 *
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/devdasher/ptb-php
 * @link http://t.me/devdasher
 */

namespace DevDasher\PTB_PHP\Config;

use Closure;
use CURLFile;
use DateInterval;
use DevDasher\PTB_PHP\Conversations\Conversation;
use Exception;
use Psr\SimpleCache\CacheInterface;
use ReflectionClass;
use ReflectionFunction;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Psr16Cache;
use Throwable;

use function DevDasher\PHPHelpers\array_clean_nulls;
use function DevDasher\PHPHelpers\array_extract_keys;
use function DevDasher\PHPHelpers\array_get;
use function DevDasher\PHPHelpers\array_set;
use function DevDasher\PHPHelpers\array_to_curl_file;
use function DevDasher\PHPHelpers\class_get_methods;
use function DevDasher\PHPHelpers\composer_is_used;
use function DevDasher\PHPHelpers\is_closure;
use function DevDasher\PHPHelpers\json_validate;
use function DevDasher\PHPHelpers\serialize;
use function DevDasher\PHPHelpers\unserialize;
use function DevDasher\PTB_PHP\Telegram\Helpers\getCallbackQueryData;
use function DevDasher\PTB_PHP\Telegram\Helpers\getCallbackQueryId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getChatId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getChosenInlineResultId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getChosenInlineResultQuery;
use function DevDasher\PTB_PHP\Telegram\Helpers\getConvertibleApiFileParameters;
use function DevDasher\PTB_PHP\Telegram\Helpers\getInlineQueryId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getInlineQueryText;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessageId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessageType;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessageTypes;
use function DevDasher\PTB_PHP\Telegram\Helpers\getText;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUpdateType;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUpdateTypes;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUserId;
use function DevDasher\PTB_PHP\Telegram\Helpers\isCallbackQuery;
use function DevDasher\PTB_PHP\Telegram\Helpers\isChosenInlineResult;
use function DevDasher\PTB_PHP\Telegram\Helpers\isInlineQuery;
use function DevDasher\PTB_PHP\Telegram\Helpers\isMessage;
use function DevDasher\PTB_PHP\Telegram\Helpers\isOfMessage;
use function DevDasher\PTB_PHP\Telegram\Helpers\isText;
use function DevDasher\PTB_PHP\Telegram\Methods\getUpdates;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

define('_PACKAGE_NAME', 'devdasher/ptb-php');

define('_REGEX_FIND_PLACEHOLDERS', '/\{([^}]+)\}/');
define('_REGEX_PLACEHOLDERS_REPLACEMENT', '(?P<$1>\w+)');

define('_CACHE_CONVERSATION_TTL', 10800);
define('_CACHE_USER_DATA_TTL', 120);

define('_FIELD_EXCEPTION', 'exception');
define('_FIELD_FALLBACK', 'fallback');
define('_FIELD_API_ERROR', 'api_error');
define('_FIELD_CALLABLE', 'callable');
define('_FIELD_HANDLERS', 'handlers');
define('_FIELD_GLOBAL_MIDDLEWARES', 'global_middlewares');
define('_FIELD_SKIP_GLOBAL_MIDDLEWARES', 'skip_global_middlewares');
define('_FIELD_LOCAL_MIDDLEWARES', 'local_middlewares');
define('_FIELD_IS_WEBHOOK', 'is_webhook');
define('_FIELD_CACHE', 'cache');
define('_FIELD_TOKEN', 'token');
define('_FIELD_BOTS', 'bots');
define('_FIELD_USERNAME', 'username');
define('_FIELD_CURL_OPTIONS', 'curl_options');
define('_FIELD_UPDATE', 'update');
define('_FIELD_GLOBAL_DATA', 'global_data');
define('_FIELD_ALLOWED_UPDATES', 'allowed_updates');
define('_FIELD_API_BASE_URL', 'api_base_url');
define('_FIELD_BOT_TOKEN', 'bot_token');
define('_FIELD_BOT_USERNAME', 'username');

function configurePTB(
    string $username,
    string $token,
    string $api_base_url = API_BASE_URL,
    array $curl_options = [],
    bool $is_webhook = false,
    ?CacheInterface $cache = null,
    array $update = [],
    array $global_data = [],
    ?array $allowed_updates = null,
): void {
    $GLOBALS[_PACKAGE_NAME] = array_merge([
        _FIELD_IS_WEBHOOK => $is_webhook,
        _FIELD_CACHE => $cache ?? (composer_is_used() ? new Psr16Cache(new ArrayAdapter()) : null),
        _FIELD_UPDATE => $update,
        _FIELD_GLOBAL_DATA => $global_data,
        _FIELD_ALLOWED_UPDATES => $allowed_updates ?? getUpdateTypes(),
        _FIELD_GLOBAL_MIDDLEWARES => [],
        _FIELD_HANDLERS => [],
        _FIELD_BOTS => [],
    ], $GLOBALS[_PACKAGE_NAME] ?? []);
    addNewBot($username, $token, $api_base_url, $curl_options);
}

function addNewBot(
    string $username,
    string $token,
    string $api_base_url = API_BASE_URL,
    array $curl_options = [],
): void {
    $GLOBALS[_PACKAGE_NAME][_FIELD_BOTS][$username] = get_defined_vars();
}

function run(): void {
    if (isWebhook()) {
        handleWebhook();
    } else {
        handleLongPolling();
    }
}

function handleWebhook(): void {
    $input = file_get_contents('php://input');
    if (!$input || !json_validate($input)) {
        return;
    }
    $update = json_decode($input, true);
    processUpdate($update);
}

function handleLongPolling(): void {
    if (PHP_SAPI !== 'cli') {
        die("This script can only be executed from the command line.");
    }
    echo 'Listening...'.PHP_EOL;
    $offset = 1;
    $timeout = 10;
    while (true) {
        $response = getUpdates(timeout: $timeout, offset: $offset);
        if (!$response[FIELD_OK]) {
            throw new \Exception('Could not fetch updates with the getUpdates method!');
        }
        $updates = $response[FIELD_RESULT];
        foreach ($updates as $update) {

            $offset = $update[FIELD_UPDATE_ID] + 1;
            processUpdate($update);
        }
        usleep(2_000_000);
    }
}

function processUpdate(array $update): void {
    setUpdate($update);
    
    $updateType = getUpdateType();
    if (!in_array($updateType, getAllowedUpdates())) {
        return;
    }
    fireHandlers(getHandlers());
}

function fireHandlers(array $handlers) {
    $updateType = getUpdateType();
    $updateHandlers = $handlers[$updateType];
    $messageType = getMessageType();
    try {
        if (isOfMessage() && isset($updateHandlers[$messageType])) {
            if (isText()) {
                $result = fireTextHandlers($updateHandlers[FIELD_TEXT], getText());
                
            } elseif (in_array($messageType, getMessageTypes())) {
                if (isUserInConversation()) {
                    $result = fireConversation();
                } else {
                    $result = fireHandler($updateHandlers[$messageType]);
                }
            }
        } elseif (isCallbackQuery() && isset($updateHandlers[FIELD_DATA])) {
            $result = fireTextHandlers($updateHandlers[FIELD_DATA], getCallbackQueryData());
    
        } elseif (isInlineQuery() && isset($updateHandlers[FIELD_QUERY])) {
            $result = fireTextHandlers($updateHandlers[FIELD_QUERY], getInlineQueryText());
    
        } elseif (isChosenInlineResult()) {
            if (isset($updateHandlers[FIELD_QUERY])) {
                $result = fireTextHandlers($updateHandlers[FIELD_QUERY], getChosenInlineResultQuery());
            }
            if (isset($updateHandlers[FIELD_RESULT_ID])) {
                $result = fireTextHandlers($updateHandlers[FIELD_RESULT_ID], getChosenInlineResultId());
            }
        }
        if (!isset($result) || $result === false) {
            if (isUserInConversation()) {
                return fireConversation();
            }
            if (isset($updateHandlers[_FIELD_CALLABLE])) {
                return fireHandler($updateHandlers);
            }
            if (isset($updateHandlers[_FIELD_FALLBACK])) {
                return fireHandler($updateHandlers[_FIELD_FALLBACK]);
            }
            if (isset($handlers[_FIELD_FALLBACK])) {
                return fireHandler($handlers[_FIELD_FALLBACK]);
            }
        }
    } catch (Throwable $e) {
        if (isset($handlers[_FIELD_EXCEPTION])) {
            $result = fireHandler($handlers[_FIELD_EXCEPTION], [$e], [
                'skip_global_middlewares' => true,
            ]);
        }
        if (!isset($result) || $result === false) {
            throw $e;
        }
    }
}

function fireHandler(array $handler, array $parameters = [], array $options = []): bool {
    $callable = $handler[_FIELD_CALLABLE];
    $globalMiddlewaresToSkip = $handler[_FIELD_SKIP_GLOBAL_MIDDLEWARES];
    $localMiddlewares = $handler[_FIELD_LOCAL_MIDDLEWARES];
    if (!isset($options['skip_global_middlewares']) || !$options['skip_global_middlewares']) {
        fireGlobalMiddlewares($globalMiddlewaresToSkip);
    }
    fireLocalMiddlewares($localMiddlewares);
    if ($callable instanceof Conversation) {
        $object = $callable;
        $steps = $object->getSteps();
        if (!$steps) {
            $steps = class_get_methods($object)[$object::class];
        }
        $currentStep = current($steps);
        call_user_func([$object, $currentStep]);
        $nextStep = next($steps);
        if ($nextStep) {
            $object->setNextStep($nextStep);
            setConversationNextStep($object);
        } else {
            endConversation();
        }
    } else {
        call_user_func($callable, ...$parameters);
    }
    return true;
}

function fireMiddlewares(array $middlewares): void {
    foreach ($middlewares as $middleware) {
        fireMiddleware($middleware);
    }
}

function fireMiddleware(callable $middleware): mixed {
    if (is_callable($middleware)) {
        return call_user_func($middleware);
    }
}

function fireGlobalMiddlewares(?array $middlewaresToSkip = null): void {
    $globalMiddlewares = getGlobalMiddlewares();
    if ($middlewaresToSkip) {
        $globalMiddlewares = array_diff_key($globalMiddlewares, array_flip($middlewaresToSkip));
    }
    fireMiddlewares($globalMiddlewares);
}

function fireLocalMiddlewares(array $localMiddlewares): void {
    fireMiddlewares($localMiddlewares);
}

function fireTextHandlers(array $handlers, string $value): bool {
    foreach ($handlers as $pattern => $handler) {
        $parameters = getCallableParameters($pattern, $value);
        if ($parameters === false) {
            continue;
        }
        if (isUserInConversation()) {
            endConversation();
        }
        return fireHandler($handler, $parameters);
    }
    if (isUserInConversation()) {
        return fireConversation();
    }
    return false;
}

function fireConversation(?array $conversation = null): bool {
    $conversation = $conversation ?? getConversation();
    $nextStep = $conversation['next_step'];
    $object = unserialize($nextStep);
    if ($object instanceof Conversation) {
        call_user_func($object);
        $nextStep = $object?->getNextStep();
        $currentStep = $nextStep;
        call_user_func([$object, $currentStep], ...($conversation['data'] ?? []));
        $steps = $object->getSteps();
        if (!$steps) {
            $steps = class_get_methods($object)[$object::class];
        }
        $currentStepIndex = array_search($currentStep, $steps);
        $nextStep = $steps[$currentStepIndex+1] ?? null;
        if ($nextStep) {
            $object->setNextStep($nextStep);
            setConversationNextStep($object);
        } else {
            endConversation();
        }

    } elseif (is_closure($closure = $object)) {
        call_user_func($closure, ...($conversation['data'] ?? []));
    }
    return true;
}

function convertToCURLFile(&$array, array $keys): void {
    foreach($keys as $key) {
        if (
            key_exists($key, $array)
            && is_string($array[$key])
            && is_file($filePath = $array[$key])
        ) {
            $array[$key] = new CURLFile($filePath);
        }
    }
}

function sendApiRequest(string $method = null, array $parameters = [], array $options = []): array|bool {
    $apiBaseUrl = $options[_FIELD_API_BASE_URL] ?? getApiBaseUrl();
    if (!$apiBaseUrl) {
        throw new Exception("The api base url is not specified!");
    }
    $token = $options[_FIELD_BOT_TOKEN] ?? getBotToken($options[_FIELD_BOT_USERNAME] ?? null);
    if (!$token) {
        throw new Exception("The bot token is not specified!");
    }
    $url = "{$apiBaseUrl}/bot{$token}/{$method}";
    $curlOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($parameters),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_SESSIONID_CACHE => true,
        CURLOPT_TCP_FASTOPEN => true,
        CURLOPT_TCP_NODELAY => true,
        CURLOPT_TIMEOUT => isWebhook() ? 3 : 10,
        CURLOPT_CONNECTTIMEOUT => isWebhook() ? 2 : 10,
        CURLOPT_FORBID_REUSE => false,
        CURLOPT_FRESH_CONNECT => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
    ] + ($options[_FIELD_CURL_OPTIONS] ?? getCurlOptions());
    $result = sendRequestUsingCURL(url: $url, options: $curlOptions);
    if (is_bool($result)) {
        return $result;
    }
    $response = json_decode($result, true);
    if (isset($response[FIELD_OK]) && !$response[FIELD_OK]) {
        $handlers = getHandlers();
        if (isset($handlers[_FIELD_API_ERROR])) {
            return fireHandler($handlers[_FIELD_API_ERROR], [$response]);
        }
    }
    return $response;
}

function sendRequestUsingCURL(string $url, array $options = []): string|bool {
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        throw new Exception("Invalid URL!");
    }
    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    if (curl_errno($ch)) {
        throw new \Exception('CURL ERROR: '.curl_error($ch));
    }
    return $result;
}

function prepareCallable(array|string|callable $callable) {
    if (is_string($callable) && class_exists($callable)) {
        $callable = new $callable;
        if (str_ends_with($callable::class, 'Conversation')) {
            return $callable;
        }
        $object = $callable;
    }
    if (is_array($callable) && isset($callable[0]) && class_exists(strval($callable[0]))) {
        $callable[0] = new $callable[0];
        $object = $callable[0];
    }
    if (!is_callable($callable)) {
        throw new Exception('Invalid callable provided!');
    }
    return $callable;
}

function addHandler(
    string $nested_keys,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    $handler = &$GLOBALS[_PACKAGE_NAME][_FIELD_HANDLERS];
    foreach(explode('.', $nested_keys) as $key) {
        $handler = &$handler[$key];
    }
    $callable = prepareCallable($callable);
    if (!is_array($local_middlewares)) {
        $local_middlewares = [$local_middlewares];
    }
    foreach ($local_middlewares as &$middleware) {
        $middleware = prepareCallable($middleware);
    }
    if (is_string($skip_global_middlewares)) {
        $skip_global_middlewares = [$skip_global_middlewares];
    }
    $skip_global_middlewares = array_filter($skip_global_middlewares, 'is_string');
    $handler[_FIELD_CALLABLE] = $callable;
    $handler[_FIELD_LOCAL_MIDDLEWARES] = $local_middlewares;
    $handler[_FIELD_SKIP_GLOBAL_MIDDLEWARES] = $skip_global_middlewares;
}

function addMiddleware(array|string|callable $callable, string $name = null): void {
    $handler = &$GLOBALS[_PACKAGE_NAME][_FIELD_GLOBAL_MIDDLEWARES];
    $callable = prepareCallable($callable);
    if (!$name) {
        if (is_object($callable) && !$callable instanceof Closure) {
            $name = $callable::class;
        } elseif (is_array($callable) && is_object($callable[0]) && !$callable[0] instanceof Closure) {
            $name = $callable[0]::class;
        }
    }
    if ($name) {
        $handler[$name] = $callable;
    } else {
        $handler[] = $callable;
    }
}

function matching(string $value, string $pattern): false|array {
    return getCallableParameters($pattern, $value);
}

function getCallableParameters(string $pattern, string $value): false|array {
    $pattern = replacePlaceholdersWithRegexSyntax($pattern);
    return getParametersFromPattern($pattern, $value);
}

function replacePlaceholdersWithRegexSyntax(string $pattern): string {
    return preg_replace(
        pattern: _REGEX_FIND_PLACEHOLDERS,
        replacement: _REGEX_PLACEHOLDERS_REPLACEMENT,
        subject: addcslashes($pattern, '/'),
    );
}

function getParametersFromPattern(string $pattern, string $value): false|array {
    if (!preg_match("/^{$pattern}$/i", $value, $matches)) {
        return false;
    }
    unset($matches[0]);
    $parameters = array_unique($matches);
    return $parameters;
}

function prepareApiMethodParameters(array $parameters): array {
    if (key_exists(PARAM_CHAT_ID, $parameters) && !$parameters[PARAM_CHAT_ID]) {
        $parameters[PARAM_CHAT_ID] = getChatId() ?? getUserId();
    }
    if (key_exists(PARAM_USER_ID, $parameters) && !$parameters[PARAM_USER_ID]) {
        $parameters[PARAM_USER_ID] = getUserId();
    }
    if (key_exists(PARAM_FROM_CHAT_ID, $parameters) && !$parameters[PARAM_FROM_CHAT_ID]) {
        $parameters[PARAM_FROM_CHAT_ID] = getChatId();
    }
    if (key_exists(PARAM_MESSAGE_ID, $parameters) && !$parameters[PARAM_MESSAGE_ID]) {
        $parameters[PARAM_MESSAGE_ID] = getMessageId();
    }
    if (key_exists(PARAM_CALLBACK_QUERY_ID, $parameters) && !$parameters[PARAM_CALLBACK_QUERY_ID]) {
        $parameters[PARAM_CALLBACK_QUERY_ID] = getCallbackQueryId();
    }
    if (key_exists(PARAM_INLINE_QUERY_ID, $parameters) && !$parameters[PARAM_INLINE_QUERY_ID]) {
        $parameters[PARAM_INLINE_QUERY_ID] = getInlineQueryId();
    }
    array_to_curl_file(array_extract_keys($parameters, getConvertibleApiFileParameters()));
    foreach (getConvertibleApiFileParameters() as $param) {
        if (key_exists($param, $parameters) && is_string($parameters[$param]) && is_file($filePath = $parameters[$param])) {
            $parameters[$param] = new CURLFile($filePath);
        }
    }
    return array_clean_nulls($parameters);
}

function prepareApiTypeFields(array $fields): array {
    if (key_exists(PARAM_CHAT_ID, $fields) && !$fields[PARAM_CHAT_ID]) {
        $fields[PARAM_CHAT_ID] = getChatId() ?? getUserId();
    }
    if (key_exists(PARAM_USER_ID, $fields) && !$fields[PARAM_USER_ID]) {
        $fields[PARAM_USER_ID] = getUserId();
    }
    foreach (getConvertibleApiFileParameters() as $param) {
        if (key_exists($param, $fields) && is_string($fields[$param]) && is_file($filePath = $fields[$param])) {
            $fields[$param] = new CURLFile($filePath);
        }
    }
    return array_clean_nulls($fields);
}

function prepareAndSendApiRequest(string $function, array $parameters = [], array $options = []): array {
    $method = (new ReflectionFunction($function))->getShortName();
    $parameters = prepareApiMethodParameters($parameters);
    return sendApiRequest($method, $parameters, $options);
}

function getConfig(?string $key = null): mixed {
    if (isset($GLOBALS[_PACKAGE_NAME])) {
        return array_get($GLOBALS[_PACKAGE_NAME], $key);
    }
    return null;
}

function setConfig(int|string $key, mixed $value): void {
    array_set($GLOBALS[_PACKAGE_NAME], $key, $value);
}

function getCache(): ?CacheInterface {
    return getConfig(_FIELD_CACHE);
}

function getBots(): ?array {
    return getConfig(_FIELD_BOTS);
}

function getBot(int|string $key = null, ?string $bot_username = null): mixed {
    $bots = getBots();
    $username = $bot_username ?? getDefaultBotUsername();
    if ($bots && isset($bots[$username])) {
        $bot = $bots[$username];
        return array_get($bot, $key);
    }
    return null;
}

function getDefaultBotUsername(): ?string {
    $bots = getBots();
    if ($bots) {
        return array_key_first(getBots());
    }
    return null;
}

function getBotToken(?string $bot_username = null): ?string {
    return getBot(_FIELD_TOKEN, $bot_username);
}

function getApiBaseUrl(?string $bot_username = null): ?string {
    return getBot(_FIELD_API_BASE_URL, $bot_username);
}

function getCurlOptions(?string $bot_username = null): ?array {
    return getBot(_FIELD_CURL_OPTIONS, $bot_username);
}

function isWebhook(): ?bool {
    return getConfig(_FIELD_IS_WEBHOOK);
}

function getHandlers(): ?array {
    return getConfig(_FIELD_HANDLERS);
}

function getGlobalMiddlewares(): ?array {
    return getConfig(_FIELD_GLOBAL_MIDDLEWARES);
}

function getUpdate(): ?array {
    return getConfig(_FIELD_UPDATE);
}

function setUpdate(array $update): void {
    setConfig(_FIELD_UPDATE, $update);
}

function getAllowedUpdates(): ?array {
    return getConfig(_FIELD_ALLOWED_UPDATES);
}

function setGlobalData(int|string $key, mixed $value = null): void {
    setConfig(_FIELD_GLOBAL_DATA, $key, $value);
}

function getGlobalData(int|string $key = null, mixed $defaultValue = null): mixed {
    $data = getConfig(_FIELD_GLOBAL_DATA);
    if (!$key) {
        return $data;
    }
    return $data[$key] ?? $defaultValue;
}

function getHandlersCommonParameters(array $parameters): array {
    $keys = [
        'callable',
        'local_middlewares',
        'skip_global_middlewares',
    ];
    return array_intersect_key($parameters, array_flip($keys));
}

function setConversationNextStep(object $next_step): void {
    updateConversation('next_step', serialize($next_step));
}

function endConversation(): void {
    deleteConversation();
}

function setConversationData(string|array $key, mixed $value, null|int|DateInterval $ttl = null): void {
    if (is_array($key)) {
        setMultipleConversationData($key, $ttl);
    } else {
        updateConversation("data.{$key}", $value);
    }
}

function getConversationData(string $key, mixed $defaultValue = null): mixed {
    return array_get(getConversation(), $key) ?? $defaultValue;
}

function setMultipleConversationData(array $data, null|int|DateInterval $ttl = null): void {
    foreach ($data as $key => $value) {
        setConversationData($key, $value, $ttl);
    }
}

function getInputFromUser(string|callable $prompt, Closure $next_step, array $conversation_data = []): void {
    is_string($prompt) ? sendMessage(text: $prompt) : $prompt();
    setMultipleConversationData($conversation_data);
    setConversationNextStep($next_step);
}

function getUserCacheKey(): ?string {
    $chatId = getChatId();
    $userId = getUserId();
    $defaultBotUsername = getDefaultBotUsername();
    if (!$chatId || !$userId || !$defaultBotUsername) {
        return null;
    }
    static $key;
    if (!$key) {
        $key = "{$defaultBotUsername}_{$chatId}_{$userId}";
    }
    return $key;
}

function getConversationKey(): string {
    return 'conversations|'.getUserCacheKey();
}

function getConversation(?string $key = null): ?array {
    $cache = getCache();
    $conversationKey = getConversationKey();
    $conversation = $cache->get($conversationKey);
    if (!$conversation) {
        return null;
    }
    return array_get($conversation, $key);
}

function deleteConversation(): bool {
    return boolval(getCache()?->delete(getConversationKey()));
}

function isUserInConversation(): bool {
    return boolval(getConversation());
}

function updateConversation(string $key, mixed $value): void {
    $conversation = getConversation();
    if ($conversation) {
        array_set($conversation, $key, $value);
    } else {
        $conversation[$key] = $value;
    }
    getCache()->set(getConversationKey(), $conversation, _CACHE_CONVERSATION_TTL);
}
