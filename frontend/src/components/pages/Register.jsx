import { memo } from "react";
import Button from "@mui/material/Button";

export const Register = memo(() => {
  return (
    <div>
      <h1>ユーザー情報管理ページ</h1>
      <p>ユーザー名（6文字以下）</p>
      <input type="text" placeholder="ユーザー名6文字以下" />
      <p>パスワード（8文字）</p>
      <input type="text" placeholder="パスワード8文字以下" />
      <p>パスワード再確認</p>
      <input type="text" placeholder="パスワード再入力" />
      <br />
      <br />
      <Button variant="contained">変更完了</Button>
    </div>
  );
});
