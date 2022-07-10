import { memo } from "react";
import { Header } from "../organisums/layout/Header";

export const HeaderLayout = memo((props) => {
  const { children } = props;
  return (
    <>
      <Header />
      {children}
    </>
  );
});
