<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

  /**
   *
   * 回答セレクトボックス取得メソッド
   * @return array
   */
  public function findAnswersSelectBoxInAdmin(): array
  {
    $answersIds = Answer::select('id')->get();
    $answersIdsArray = [];
    $count = count($answersIds);
    foreach ($answersIds as $answersId) {
      $answersIdsArray[$answersId->id] = $answersId->id;
      if ($count === $answersId->id) {
        $answersIdsArray[$answersId->id + 1] = $answersId->id + 1;
      }
    }
    return $answersIdsArray;
  }

  /**
   *
   * 4択回答セレクトボックス取得メソッド
   * @return array
   */
  public function find4AnswersSelectBoxInAdmin(): array
  {
    $correctAnswerNoArray = [];

    for ($i = 1; $i <= 4; $i++) {
      $correctAnswerNoArray[$i] = $i;
    }
    return $correctAnswerNoArray;
  }
  // ここまで追加
}
