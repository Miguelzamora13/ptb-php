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

namespace DevDasher\PTB_PHP\Conversations;

abstract class Conversation
{
    protected array $steps = [];

    private string $nextStep;

    public function getSteps(): array
    {
        return $this->steps;
    }

    public function setNextStep(string $methodName)
    {
        $this->nextStep = $methodName;
    }

    public function getNextStep(): string
    {
        return $this->nextStep;
    }
    
    public function __invoke()
    {
    }
}