<?php

namespace App\Livewire\Auth;

use App\Helpers\Helper;
use App\Mail\SendOTP;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

#[Layout('components.layouts.auth')]

class Login extends Component
{

    public $showLoginInfo = true;
    public $showOTPVerify = false;

    public $email, $password, $generateOTP, $verify_otp_code;



    /**
     * login
     *
     * @return void
     */
    public function login()
    {

        $this->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        if (Auth::attempt($this->only('email', 'password'))) {
            $this->showLoginInfo = false;
            $this->generateOTP = Helper::generateOTP();// generate OTP verification Code
            Mail::to($this->email)->send(new SendOTP($this->email, $this->generateOTP));// Send OTP vai email
            $this->dispatch('alert', type: 'success', message: __('messages.login.otp_successfully'));
            $this->showOTPVerify = true;
        } else {
            $this->dispatch('alert', type: 'error', message: __('messages.login.invalid_credentials_error'));
        }

    }

    /**
     * verifyOtp
     *
     * @return void
     */
    public function verifyOtp()
    {

        $this->validate([
            'verify_otp_code' => 'required|numeric|digits:6',
        ]);

        if ($this->generateOTP != $this->verify_otp_code) {
            $this->dispatch('alert', type: 'error', message: __('messages.login.invalid_otp_error'));
        } else {
            $this->clearForm();//clear all form data
            return $this->redirect('/dashboard', navigate: true);// redirect to dashboard
        }

    }

    /**
     * back
     *
     * @return void
     */
    public function back()
    {
        $this->showOTPVerify = false;
        $this->showLoginInfo = true;
        $this->password = '';
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.auth.login')->title(__('messages.login.title'));
    }

    /**
     * clearForm
     *
     * @return void
     */
    public function clearForm(){
        $this->email = '';
        $this->password = '';
        $this->generateOTP = '';
        $this->verify_otp_code = '';
    }
}
