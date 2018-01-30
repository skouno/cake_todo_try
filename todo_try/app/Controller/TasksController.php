<?php
class TasksController extends AppController {
    // 動作確認のためにscaffoldを使う
    public $scaffold;

    public function index() {
        // 空のデータをビューへ渡す
        $tasks_data = array();
        $this->set('tasks_data',$tasks_data);

        // app/View/Tasks/index.ctpを表示
        $this->render('index');
    }

    public function done() {
        // URLの末尾からタスクのIDを取得してメッセージを作成
        $msg = sprintf(
            'タスク %s を完了しました。',
            $this->request->pass[0]
        );

        //メッセージを表示してリダイレクト
        $this->flash($msg,'/Tasks/index');
    }
}
