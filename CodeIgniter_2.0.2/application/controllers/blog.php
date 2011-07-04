<?php
class Blog extends CI_Controller {

    public function index()
    {
        $data['title'] = "Title Blog index";
        $data['heading'] = "Heading Blog index";
        $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');

        $this->load->view('blog/blog_index', $data);
    }

    public function comments()
    {
        $this->load->library('parser');

        $data = array(
                      'blog_title'   => 'My Blog Title',
                      'blog_heading' => 'My Blog Heading',
                      'blog_entries' => array(
                                              array('title' => 'Title 1', 'body' => 'Body 1'),
                                              array('title' => 'Title 2', 'body' => 'Body 2'),
                                              array('title' => 'Title 3', 'body' => 'Body 3'),
                                              array('title' => 'Title 4', 'body' => 'Body 4'),
                                              array('title' => 'Title 5', 'body' => 'Body 5')
                                              )
                    );

        $this->parser->parse('blog/blog_comments', $data);
    }

    function view()
    {
        $data['title'] = "Title Blog view";
        $data['heading'] = "Heading Blog view";

        $this->load->model('Blogmodel');

        $data['entry'] = $this->Blogmodel->get_last_ten_entries();

        $this->load->view('blog/blog_view', $data);
$this->output->enable_profiler(TRUE);
    }
}
