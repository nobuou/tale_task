import "./App.css";
import { HeaderLayout } from "./components/templates/HeaderLayout";
import { Router } from "./router/Router";

function App() {
  return (
    <HeaderLayout>
      <Router />
    </HeaderLayout>
  );
}

export default App;
