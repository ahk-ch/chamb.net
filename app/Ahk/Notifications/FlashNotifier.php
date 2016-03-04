<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Notifications;


use Illuminate\Session\Store;

/**
 * Class FlashNotifier
 * @package App\Ahk\Notifications
 */
class FlashNotifier
{

    /**
     * @var Store
     */
    private $session;

    /**
     * FlashNotifier constructor.
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param $message
     */
    public function success($message)
    {
        $this->message($message, 'success');
    }

    /**
     * @param $message
     * @param string $level
     */
    public function message($message, $level = 'info')
    {
        $notification = new \stdClass;

        $notification->message = $message;

        $notification->level = $level;

        $notifications = $this->session->get('flash_notifications', []);

        array_push($notifications, $notification);

        $this->session->flash('flash_notifications', $notifications);
    }

    /**
     * @param $message
     */
    public function error($message)
    {
        $this->message($message, 'error');
    }
}
