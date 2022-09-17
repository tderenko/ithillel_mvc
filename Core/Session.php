<?php

namespace Core;

use App\Models\User;

class Session
{
    public function __construct(
        protected string $sessionId
    ){}

    public static function init()
    {
        session_start();
        return new static(session_id());
    }

    public function login(User $user): void
    {
        if ($user->id) {
            $_SESSION['auth'] = base64_encode(App::$app->getConfig('session.hash') . "_{$user->id}");
        }
    }

    public function getAuthUser():User|null
    {
        if (isset($_SESSION['auth'])) {
            $userId = str_replace(App::$app->getConfig('session.hash') . '_', '', base64_decode($_SESSION['auth']));
            return is_numeric($userId) ? User::find($userId) : null;
        }
        return null;
    }

    public function logout()
    {
        unset($_SESSION['auth']);
    }

    public function setData(string $key, string $value): static
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function getData($key): string|null
    {
        return $_SESSION[$key] ?? null;
    }

    public function setMessage(string $message): static
    {
        $_SESSION['message'] = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $_SESSION['message'] ?? '';
    }

    public function flashMessage(): string
    {
        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']);
        return $message;
    }
}
