<?php

namespace App\Controller;

use App\Model\User;

class AuthController extends Controller
{
    public function loginAction()
    {
        if ($this->method() === 'POST') {
            if (
                empty($_POST['email'])
                ||
                empty($_POST['password'])
            ) {
                $_SESSION['error'] = 'Informe todos os dados';

                return $this->back();
            }

            $user = User::getByEmail($_POST['email']);

            if (
                empty($user)
                ||
                !User::isValidPassword($_POST['password'], $user['password'])
            ) {
                $_SESSION['error'] = 'Usuário não encontrado';

                return $this->back();
            }

            $_SESSION['user'] = $user;

            return $this->redirect('/home');
        }


        return $this->page('auth/login');
    }

    public function registerAction()
    {
        if ($this->method() === 'POST') {
            if (
                empty($_POST['name'])
                ||
                empty($_POST['email'])
                ||
                empty($_POST['password'])
            ) {
                $_SESSION['error'] = 'Informe todos os dados';

                return $this->back();
            }

            if (!empty(User::getByEmail($_POST['email']))) {
                $_SESSION['error'] = 'E-mail já cadastrado';

                return $this->back();
            }

            $created = User::insert(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );

            if ($created) {
                $_SERVER['user'] = User::getByEmail($_POST['email']);

                return $this->redirect('/home');
            } else {
                $_SERVER['error'] = 'Erro ao criar usuário';

                return $this->back();
            }
        }

        return $this->page('auth/register');
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);

        return $this->redirect('/');
    }
}