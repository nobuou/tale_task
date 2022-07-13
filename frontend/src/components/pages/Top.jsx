import { memo } from "react";
import Button from "@mui/material/Button";

export const Top = memo(() => {
  return (
    <div>
      <h1>新規会員登録画面</h1>
      <Button variant="contained">新規会員登録</Button>
      <Button variant="contained">ログイン</Button>
    </div>
  );
});
