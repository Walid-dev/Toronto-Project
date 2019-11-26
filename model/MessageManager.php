<?php
class MessageManager extends Manager
{
    public function sendMessage($postId, $senderId, $recipient, $subject, $content)
    {
        $db = Manager::dbConnect();

        $message = $db->prepare('INSERT INTO message(postId, senderId, recipient, subject, content, date) VALUES(?, ?, ?, ?, ?, NOW())');
        $message->execute(array($postId, $senderId, $recipient, $subject, $content));
    }

    public function getMessage()
    {
        $db = Manager::dbConnect();
    }
}
