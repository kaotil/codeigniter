<?php
$config = array(
                 'form' => array(
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
                 'signup' => array(
                                    array(
                                            'field' => 'user_name',
                                            'label' => 'ユーザ名',
                                            'rules' => 'trim|required|alpha_dash|min_length[4]|max_length[50]'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'メールアドレス',
                                            'rules' => 'trim|required|valid_email|max_length[100]'
                                         ),
                                    array(
                                            'field' => 'pass',
                                            'label' => 'パスワード',
                                            'rules' => 'trim|required|single|min_length[8]|max_length[100]'
                                         )
                                    )
               );