import { memo } from "react";
import Button from "@mui/material/Button";

export const PreRegister = memo(() => {
  return (
    <div>
      <h1>新規会員登録</h1>
      <input type="text" placeholder="メールアドレス" />
      <br />
      <br />
      <Button variant="contained">登録</Button>
    </div>
  );
});
