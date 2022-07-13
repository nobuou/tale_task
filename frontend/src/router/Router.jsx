import { memo } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Top } from "../components/pages/Top";
import { PreRegister } from "../components/pages/PreRegister";
import { Register } from "../components/pages/Register";
import { Home } from "../components/pages/Home";
import { Setting } from "../components/pages/Setting";
import { Post } from "../components/pages/Post";
import { Page404 } from "../components/pages/Page404";

export const Router = memo(() => {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Top />} />
        <Route path="/pre-register" element={<PreRegister />} />
        <Route path="/register" element={<Register />} />
        <Route path="/home" element={<Home />} />
        <Route path="/setting" element={<Setting />} />
        <Route path="/post" element={<Post />} />
        <Route path="*" element={<Page404 />} />
      </Routes>
    </BrowserRouter>
  );
});
