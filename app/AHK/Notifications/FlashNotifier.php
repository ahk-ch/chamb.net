<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\AHK\Notifications;


use Illuminate\Session\Store;

class FlashNotifier {
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

	public function success($message)
	{
		$this->message($message, 'success');
	}

	public function message($message, $level = 'info')
	{
		$notification = new \stdClass;

		$notification->message = $message;

		$notification->level = $level;

		$notifications = $this->session->get('flash_notifications', []);

		array_push($notifications, $notification);

		$this->session->flash('flash_notifications', $notifications);
	}

	public function error($message)
	{
		$this->message($message, 'error');
	}

	public function warning($message)
	{
		$this->message($message, 'notice');
	}
}