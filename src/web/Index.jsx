import { Outlet } from "react-router-dom";
import Header from "./Header";
import Footer from "./Footer";
const Index = () => {
  return (
    <>
      <Header />
      <Outlet />
      <Footer />
    </>
  );
};

export default Index;
