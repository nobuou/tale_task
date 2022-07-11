import { memo } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Login } from "../components/pages/Login";
import { Home } from "../components/pages/Home";
import { Setting } from "../components/pages/Setting";
import { UserManagement } from "../components/pages/UserManagement";
import { Page404 } from "../components/pages/Page404";

export const Router = memo(() => {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/home" element={<Home />} />
        <Route path="/setting" element={<Setting />} />
        <Route path="/user" element={<UserManagement />} />
        <Route path="*" element={<Page404 />} />
      </Routes>
    </BrowserRouter>
  );
});
