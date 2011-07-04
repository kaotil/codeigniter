<?php
$config = array(
                 'signup' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'ユーザ名',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'パスワード',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => 'パスワードの確認',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'メールアドレス',
                                            'rules' => 'required'
                                         )
                                    ),
                 'email' => array(
                                    array(
                                            'field' => 'emailaddress',
                                            'label' => 'メールアドレス',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => '名前',
                                            'rules' => 'required|alpha'
                                         ),
                                    array(
                                            'field' => 'title',
                                            'label' => 'タイトル',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'メッセージ本文',
                                            'rules' => 'required'
                                         )
                                    )
               );