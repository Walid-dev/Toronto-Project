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
        $recipient = $_SESSION['userUid'];
        $messages = $db->prepare('SELECT id, postId, recipient, senderId, content, subject, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin\') AS date FROM message WHERE recipient="' . $recipient . '" ORDER BY date DESC');
        $messages->execute(array(' id'));
        return $messages;
    }
}
