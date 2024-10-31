import Header from "./../HeaderPages";
// import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import { Check } from "@mui/icons-material";
import "./../../../css/main.css";
import service from "./../../../css/servicios.module.css";
import empresarial from "./../../../img/empresarial_min.webp";
import mobile_home from "./../../../img/home.webp";
import mobile_login from "./../../../img/login.webp";
import mobile_splash from "./../../../img/splash.webp";
import integracion from "./../../../img/integracion_min.webp";

const Servicios = () => {
    return (
        <>
            <Head>
                <title>Servicios | Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header title={"Nuestros Servicios"} />
            <main>
                <section className={service.web} id="paginasWeb">
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <h1 className="text-center py-4">
                                    Paginas webs
                                </h1>
                                <p
                                    className={`text-justify ${service.parrafo}`}
                                >
                                    Posicionamos tu negocio en internet, y te
                                    acercamos a más clientes!, con un diseño de
                                    pagina enfocado en lo que ofreces, y con
                                    compatibilidad en la mayoria de los
                                    dispositivos del mercado
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex  justify-content-center align-content-stretch my-5">
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                                >
                                    <small>Sitio estático</small>
                                    <h4>Plan basico</h4>
                                    <p className={service.price}>185.640</p>
                                    <small>iva incluido</small>
                                    <ul className="mt-4 list-group list-group-flush">
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success " />
                                            Hosting anual
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Dominio .cl x 1 año
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Correos Corporativos
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Menú de 3 Secciones
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Certificado SSL
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            1 mes de Manteción
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Autoadministrable
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            1gb de Almacenamiento
                                        </li>
                                    </ul>
                                    <button className="btn btn-primary mt-4">
                                        Obtener Plan
                                    </button>
                                </div>
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table} ${service.pro}`}
                                >
                                    <small>Sitio dinámico</small>
                                    <h4>Plan emprendedor</h4>
                                    <p className={service.price}>297.500</p>
                                    <small>iva incluido</small>
                                    <ul className="mt-4 list-group list-group-flush">
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Hosting anual
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Dominio .cl x 1 año
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Correos Corporativos
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Menú de 5 Secciones
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Certificado SSL
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />2 meses de
                                            Manteción
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Autoadministrable
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            2gb de Almacenamiento
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Botón de whatsapp
                                        </li>
                                    </ul>
                                    <div className="d-grid">
                                        <button
                                            className="btn btn-light mt-4"
                                            type="button"
                                        >
                                            Obtener Plan
                                        </button>
                                    </div>
                                </div>
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                                >
                                    <small>Sitio dinámico</small>
                                    <h4>Plan premium</h4>
                                    <p className={service.price}>476.000</p>
                                    <small>iva incluido</small>
                                    <ul className="mt-4 list-group list-group-flush">
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Hosting anual
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Dominio .cl x 2 años
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Correos Corporativos
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Menú de 10 Secciones
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Certificado SSL
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            3 meses de Manteción
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Autoadministrable
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            3gb de Almacenamiento
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Botón de whatsapp
                                        </li>
                                    </ul>
                                    <button className="btn btn-primary mt-4">
                                        Obtener Plan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section className={service.custom} id="aplicacionesMedida">
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <h1 className="text-center py-4">
                                    Soluciones empresariales
                                </h1>
                                <p className={`text-justify`}>
                                    Crearemos tu idea de proyecto en software
                                    funcional a base de los requerimientos que
                                    nos solicites, y estarás viendo los
                                    resultados lo más pronto posible
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex align-items-center justify-content-center">
                                <div className="col-lg-6 d-flex align-items-end justify-content-end">
                                    <img
                                        src={empresarial}
                                        alt="empresarial"
                                        className={service.img_empresarial}
                                    />
                                </div>
                                <div className="col-lg-6 d-flex align-items-center justify-content-start">
                                    <ul className={service.list_empresarial}>
                                        <li className="">
                                            <Check className="me-2 text-success " />
                                            Reunión inicial
                                        </li>
                                        <li className="">
                                            <Check className="me-2 text-success" />
                                            Reporte de avances
                                        </li>
                                        <li className="">
                                            <Check className="me-2 text-success" />
                                            Pruebas de diseño ciclicas
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Mantenciones mensuales
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section className={service.mobile} id="appsMobile">
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <h1 className="text-center py-4">
                                    Aplicaciones moviles
                                </h1>
                                <p
                                    className={`text-justify ${service.parrafo}`}
                                >
                                    Convertiremos tu proyecto en una app, para
                                    android ó iphone con acceso a la tienda que
                                    corresponda ó para los propositos que tengas
                                    en mente
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex align-items-center justify-content-center">
                                <div className="col-lg-6 d-flex align-items-center justify-content-center">
                                    <ul className={service.list_empresarial}>
                                        <li className="">
                                            <Check className="me-2 text-success " />
                                            Reunión inicial
                                        </li>
                                        <li className="">
                                            <Check className="me-2 text-success" />
                                            Reporte de avances
                                        </li>
                                        <li className="">
                                            <Check className="me-2 text-success" />
                                            Pruebas de diseño ciclicas
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Mantenciones mensuales
                                        </li>
                                    </ul>
                                </div>
                                <div className="col-lg-6 d-flex">
                                    <img
                                        src={mobile_splash}
                                        alt=""
                                        className={service.img_mobile}
                                    />
                                    <img
                                        src={mobile_login}
                                        alt=""
                                        className={service.img_mobile}
                                    />
                                    <img
                                        src={mobile_home}
                                        alt=""
                                        className={service.img_mobile}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section className={service.integration} id="integracion">
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <h1 className="text-center py-4">
                                    Integraciones
                                </h1>
                                <p className={`text-justify`}>
                                    Conectamos a tu sistema la información de
                                    apis que necesites y organizamos el
                                    contenido de forma armoniosa con los
                                    elementos de de tu software
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex align-items-center justify-content-center">
                                <div className="col-lg-6 d-flex align-items-center justify-content-end">
                                    <img
                                        src={integracion}
                                        alt=""
                                        className={service.img_integracion}
                                    />
                                </div>
                                <div className="col-lg-6 d-flex align-items-center justify-content-start">
                                    <ul className={service.list_empresarial}>
                                        <li className="">
                                            <Check className="me-2 text-success " />
                                            Reunión inicial
                                        </li>
                                        <li className="">
                                            <Check className="me-2 text-success" />
                                            Reporte de avances
                                        </li>
                                        <li className="">
                                            <Check className="me-2 text-success" />
                                            Pruebas de funcionamiento ciclicas
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Mantenciones, pruebas y validaciones
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            {/* <Contact /> */}
            <Footer />
        </>
    );
};

export default Servicios;
