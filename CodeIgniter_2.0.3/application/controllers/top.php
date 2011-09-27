<?php
class Top extends CI_Controller {

    public function index()
    {
        // 変数の初期化
        $data['username'] = '';

        // ログインしているか
        if ($this->dx_auth->is_logged_in()) {
            // ログイン情報取得
            $user_id = $this->dx_auth->get_user_id();
            $data['username'] = $this->dx_auth->get_username();

        }

// パスワード保存できない
// user情報変更

// recaptchaを使ってみる
// テンプレート日本語化
// authメッセージ日本語化
        // 画面表示
        $content = $this->load->view('top/index', $data, true);
        $this->layout->write('title', 'Top [ index ]')->write('content', $content)->render();
    }

    public function comments()
    {
        echo 'Look at this!';
    }
}