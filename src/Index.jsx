import Service from "./pages/service";
import team from "./img/team_2.png";
import logo from "./img/logo-blanco.png";
import indexcss from "./index.module.css";
const Index = () => {
  return (
    <>
      <header className={indexcss.cabecera}>
        <nav className="navbar navbar-expand-lg navbar-dark bg-transparent container">
          <div className="container">
            <a className="navbar-brand" href="#">
              <img src={logo} className={indexcss.logo} alt="" />
            </a>
            {/* <button
              className="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span className="navbar-toggler-icon"></span>
            </button> */}
            {/* <div
              className="collapse navbar-collapse"
              id="navbarSupportedContent"
            >
              <ul className="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li className="nav-item">
                  <a className="nav-link text-white" href="#service">
                    Nuestros Servicios
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link text-white" href="#">
                    Contacto
                  </a>
                </li>
              </ul>
              <span className="navbar-text text-white">+56949109970</span>
              <button className="btn btn-info text-white ms-4">
                Contactanos
              </button>
            </div> */}
          </div>
        </nav>
        <section className="d-flex justify-content-sm-center justify-content-md-between container banner">
          <article className="d-flex flex-column justify-content-center align-content-center text-white mt-5 p-2 col-md-6 col-sm-12 col-xs-12 gap-4 welcome">
            <h1 className="display-4 text-center text-md-start">
              Excelencia en Ingeniería
              <p className="display-6 text-center text-md-start">
                Y pasión por la tecnología!
              </p>
            </h1>

            <p className="text-wrap">
              En <b>SysifosWeb</b>, ofrecemos software a medida que no solo
              cumple, sino que supera expectativas
            </p>
            <div className="text-center text-md-start mb-4">
              <button className={"btn btn-primary btn-md col-6 "+indexcss.btnContact}>
                Más información
              </button>
            </div>
          </article>
          <article className="d-flex justify-content-center align-self-end d-none d-md-block">
            <img src={team} className={indexcss.bannerImg} alt="" />
          </article>
        </section>
      </header>
      <Service></Service>
      <section className={indexcss.prefooter}>
        <div className="container">
          <p className={indexcss.font300}>
            La calidad no es negociable en <b>SysifosWeb</b>. Nos comprometemos
            a entregar software que no solo funcione bien, sino que también sea
            robusto, seguro y sostenible a largo plazo. Nuestro equipo sigue las
            mejores prácticas de la industria y está constantemente innovando
            para asegurar que cada línea de código contribuya al éxito de
            nuestros clientes.
          </p>
        </div>
      </section>
      <footer>
        <div className="container d-flex justify-content-center flex-wrap">
          <div className="d-flex flex-column  dir col-md-6">
            <h5>Contactanos</h5>
            <p>
              <b>Telefono : </b> +56949109970
            </p>
            <p>
              <b>Correo : </b> sysifosweb@gmail.com
            </p>
          </div>
          <div className="d-flex flex-column  redes col-md-6">
            <h5>Red Social</h5>
          </div>
        </div>
      </footer>
    </>
  );
};

export default Index;
