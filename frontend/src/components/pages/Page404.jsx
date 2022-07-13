import { memo } from "react";
import { HeaderLayout } from "../templates/HeaderLayout";

export const Page404 = memo(() => {
  return (
    <>
      <HeaderLayout />
      <h1>404 not found</h1>
      <p>お探しのページは見つかりませんでした。</p>
    </>
  );
});
