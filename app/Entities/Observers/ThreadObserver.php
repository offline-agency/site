<?php

namespace LaravelItalia\Entities\Observers;

use LaravelItalia\Entities\Thread;
use LaravelItalia\Entities\Reply;

/**
 * Class ThreadObserver.
 */
class ThreadObserver
{
    /**
     * @param Thread $thread
     */
    public function deleting(Thread $thread)
    {
        $replies = $thread->replies()->get();

        /* @var $reply Reply */
        foreach($replies as $reply){
            $reply->delete();
        }
    }
}
