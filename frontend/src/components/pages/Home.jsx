import { memo } from "react";
import { HeaderLayout } from "../templates/HeaderLayout";

export const Home = memo(() => {
  return (
    <div>
      <HeaderLayout />
      <p>投稿一覧</p>
      <p>新規投稿etc...</p>
    </div>
  );
});
