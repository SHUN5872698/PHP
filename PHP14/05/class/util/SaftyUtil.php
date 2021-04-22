<?php

/**
 * 安全対策ユーティリティクラス
 */

class SaftyUtil
{
  /**
   * POSTまたはGETで送信されてきた連想配列の要素の値をサニタイズする（1次元配列のみ）
   *
   * @param array $post POSTまたはGETで取得した連想配列
   * @return array
   */
  public function sanitize(array $post)
  {
    foreach ($post as $k => $v) {
      $post[$k] = htmlspecialchars($v);
    }
    return $post;
  }

  /**
   * ワンタイムトークンを発生させる
   *
   * @param string $tokenName セッションに保存するトークンのキーの名前
   * @return string
   */
  public static function generateToken(string $tokenName = 'token'): string
  {
    // ワンタイムトークンを生成してセッションに保存する
    $token = bin2hex(openssl_random_pseudo_bytes(Config::RANDOM_PSEUDO_STRING_LENGTH));
    $_SESSION[$tokenName] = $token;
    return $token;
  }

  // フォームで送信されてきたトークンが正しいかどうか確認(CSRF対策)
  public static function isValidToken(string $token, string $tokenName = 'token'): bool
  {
    if (!isset($_SESSION[$tokenName]) || $_SESSION[$tokenName] !== $token) {

      return false;
    }
    return true;
  }
}
