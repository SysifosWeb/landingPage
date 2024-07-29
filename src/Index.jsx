import Service from "./pages/service";
import logo from "/img/logo-blanco.png";
import indexcss from "./css/index.module.css";
import whatsapp from "/img/whatsapp.png";
import instagram from "/img/insta.png";
import gmail from "/img/gmail.png";
const Index = () => {
  return (
    <>
      <header className={indexcss.cabecera}>
        <nav className="navbar navbar-expand-lg navbar-dark bg-transparent container">
          <div className="container">
            <a className="navbar-brand" href="#">
              <img src={logo} className={indexcss.logo} alt="" />
            </a>
          </div>
        </nav>
        <section className="d-flex justify-content-center align-items-center container banner">
          <article className="d-flex flex-column justify-content-center align-items-center text-white pb-5 mt-5 gap-2 welcome">
            <b>Desarrollo web y aplicaciones a medida</b>
            <h1 className="text-center">
              Soluciones digitales a tu medida
              {/* <p className="display-6 text-center text-md-start">
                Y pasión por la tecnología!
              </p> */}
            </h1>

            <p className="text-center">
              Desarrollamos aplicaciones web y software personalizados para
              impulsar tu negocio
            </p>
            <div className="d-flex justify-content-center align-items-center mb-4">
              <a
                className={"btn btn-success btn-lg " + indexcss.btnContact}
                aria-label="Chat on WhatsApp"
                href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20porfavor"
              >
                <img src={whatsapp} style={{ height: "3rem" }} />
                Contactanos
              </a>
            </div>
          </article>
        </section>
      </header>
      <Service></Service>
      <section className={indexcss.prefooter}>
        <div className="container d-flex flex-column align-items-center">
          <h2> No lo pienses más!</h2>
          <p className={indexcss.font300}>
            Contactanos y hablemos sobre el proyecto que tienes en mente
          </p>
          <a
            className={"btn btn-success btn-lg " + indexcss.btnContact}
            aria-label="Chat on WhatsApp"
            href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20porfavor"
          >
            <img src={whatsapp} style={{ height: "3rem" }} />
            Contactanos
          </a>
        </div>
      </section>
      <footer>
        <div className="container d-flex flex-column flex-md-row justify-content-center justify-content-md-between">
          <div className="d-flex justify-content-md-end align-items-center pb-4">
            <img src={logo} alt="" />
          </div>
          <div className="d-flex flex-column justify-content-md-start dir">
            <h4 className="mb-3 text-start">Contactanos</h4>
            <div className="d-flex align-items-center">
              <span className="material-icons me-2">phone_in_talk </span>
              +56949109970
            </div>
            <div className="d-flex align-items-center">
              <img src={gmail} alt="" className="me-1" />
              sysifosweb@gmail.com
            </div>
            <div className="d-flex align-items-center">
              <img src={instagram} alt="" className="me-1" />
              sysifosweb_
            </div>
          </div>
        </div>
      </footer>
    </>
  );
};

export default Index;
