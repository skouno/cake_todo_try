<?php
class TasksController extends AppController {
    // 動作確認のためにscaffoldを使う
    public $scaffold;

    public function index() {
        // データをモデルから取得してビューへ渡す
        $options = array(
            'conditions' => array(
                'Task.status' => 0
            )
        );

        $tasks_data = $this->Task->find('all', $options);
        $this->set('tasks_data',$tasks_data);

        // app/View/Tasks/index.ctpを表示
        $this->render('index');
    }

    public function done() {
        // URLの末尾からタスクのIDを取得してデータを更新
        $id = $this->request->pass[0];
        $this->Task->id = $id;
        $this->Task->saveField('status',1);
        $msg = sprintf('タスク %s を完了しました。',$id);

        //メッセージを表示してリダイレクト
        $this->flash($msg,'/Tasks/index');
    }
}
