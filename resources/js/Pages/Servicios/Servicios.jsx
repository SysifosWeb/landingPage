import Header from "./../HeaderPages";
// import Contact from "./../Contact";
import Footer from "./../Footer";
import Contact from "./../Contact";
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
                <title>
                    Servicios | SysifosWeb Soluciones Informáticas Limitada
                </title>
                <meta
                    head-key="description"
                    name="description"
                    content="Paginas web, Desarrollo de software a medida, Aplicaciones mobiles y Integración de sistemas, los mejores precios que encontraras!"
                />
                <link
                    rel="canonical"
                    href="https://www.sysifosweb.cl/Servicios"
                />
                <meta
                    property="og:title"
                    content="Servicios | SysifosWeb Soluciones Informáticas Limitada"
                />
                <meta
                    property="og:description"
                    content="Paginas web, Desarrollo de software a medida, Aplicaciones mobiles y Integración de sistemas, los mejores precios que encontraras!"
                />
                <meta
                    property="og:url"
                    content="https://www.sysifosweb.cl/servicios"
                />
                <meta
                    property="og:image"
                    content="https://www.sysifosweb.cl/assets/equipoMin-ijW4D7nV.webp"
                />
                <meta property="og:image:width" content="1200" />
                <meta property="og:image:height" content="627" />
                <meta property="fb:app_id" content="1215450019494398" />
                <meta property="og:locale" content="es_LA" />
                <meta property="og:type" content="website" />
                <meta property="og:site_name" content="Sysifos Web" />
                <meta property="og:share_count" content="true" />
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
                                    Posicionamos tu negocio en internet y te
                                    acercamos a más clientes con un diseño de
                                    página enfocado en tus servicios y
                                    compatible con la mayoría de dispositivos
                                    del mercado.
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div
                                className={`d-flex  justify-content-center align-content-stretch my-5 ${service.table_columns}`}
                            >
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                                >
                                    <small>Sitio dinámico</small>
                                    <h4>Plan básico</h4>
                                    <div
                                        className={`${service.offerPriceContainer}`}
                                    >
                                        {/* <div
                                            className={`${service.offerPricePercentage}`}
                                        >
                                            10%
                                        </div> */}
                                        <p className={service.price}>185.640</p>
                                    </div>
                                    <small>IVA incluido</small>
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
                                            1 GB de almacenamiento
                                        </li>
                                    </ul>
                                    <a
                                        className="btn btn-primary mt-4"
                                        type="button"
                                        title="Chat on WhatsApp"
                                        aria-label="Chat on WhatsApp"
                                        href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20del%20plan%20básico"
                                    >
                                        Obtener Plan
                                    </a>
                                </div>
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table} ${service.pro}`}
                                >
                                    <small className="text-white">
                                        Sitio dinámico
                                    </small>
                                    <h4>Plan emprendedor</h4>
                                    <div
                                        className={`${service.offerPriceContainer}`}
                                    >
                                        {/* <div
                                            className={`${service.offerPricePercentage}`}
                                        >
                                            10%
                                        </div> */}
                                        <p className={service.price}>297.500</p>
                                    </div>
                                    <small className="text-white">
                                        IVA incluido
                                    </small>
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
                                            <Check className="me-2" />2 GB de
                                            almacenamiento
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Botón de whatsapp
                                        </li>
                                    </ul>
                                    <div className="d-grid">
                                        <a
                                            className="btn btn-light mt-4"
                                            type="button"
                                            title="Chat on WhatsApp"
                                            aria-label="Chat on WhatsApp"
                                            href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20del%20plan%emprendedor"
                                        >
                                            Obtener Plan
                                        </a>
                                    </div>
                                </div>
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                                >
                                    <small>Sitio dinámico</small>
                                    <h4>Plan premium</h4>
                                    <div
                                        className={`${service.offerPriceContainer}`}
                                    >
                                        {/* <div
                                            className={`${service.offerPricePercentage}`}
                                        >
                                            10%
                                        </div> */}
                                        <p className={service.price}>470.000</p>
                                    </div>
                                    <small>IVA incluido</small>
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
                                            3 GB de Almacenamiento
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2 text-success" />
                                            Botón de whatsapp
                                        </li>
                                    </ul>
                                    <a
                                        className="btn btn-primary mt-4"
                                        type="button"
                                        title="Chat on WhatsApp"
                                        aria-label="Chat on WhatsApp"
                                        href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20del%20plan%premium"
                                    >
                                        Obtener Plan
                                    </a>
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
                                    Creamos tu proyecto de software funcional
                                    basado en los requerimientos que nos
                                    solicites. Te mantendremos informado para
                                    que veas los resultados lo más pronto
                                    posible.
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex row align-items-center justify-content-center">
                                <div className="col-lg-6 d-flex justify-content-center">
                                    <img
                                        src={empresarial}
                                        title="Software empresarial"
                                        alt="empresarial"
                                        className={service.img_empresarial}
                                    />
                                </div>
                                <div className="col-lg-6 d-flex align-items-center justify-content-center">
                                    <div className="pe-4 pt-4">
                                        <h4 className="ps-4">
                                            Proceso de Implementación
                                        </h4>
                                        <ul
                                            className={service.list_empresarial}
                                        >
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
                                                Pruebas de diseño cíclicas
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
                    </div>
                </section>
                <section className={service.mobile} id="appsMobile">
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <h1 className="text-center py-4">
                                    Aplicaciones móviles
                                </h1>
                                <p
                                    className={`text-justify ${service.parrafo}`}
                                >
                                    Convertiremos tu proyecto en una app para
                                    Android o iPhone, con acceso a la tienda
                                    correspondiente, o adaptada a los propósitos
                                    que tengas en mente.
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex row align-items-center justify-content-center">
                                <div className="col-lg-6 d-flex align-items-center justify-content-center">
                                    <div className="pe-4 pb-4">
                                        <h4 className="ps-4">
                                            Proceso de Implementación
                                        </h4>
                                        <ul
                                            className={service.list_empresarial}
                                        >
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
                                                Pruebas de diseño cíclicas
                                            </li>
                                            <li className="list-group-item">
                                                <Check className="me-2 text-success" />
                                                Mantenciones mensuales
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div className="col-lg-6 d-flex row">
                                    <div className="col-sm-4 justify-content-center d-flex pb-4">
                                        <img
                                            src={mobile_splash}
                                            title="Splash Screen"
                                            alt="splash"
                                            className={service.img_mobile}
                                        />
                                    </div>
                                    <div className="col-sm-4 justify-content-center d-flex pb-4">
                                        <img
                                            src={mobile_login}
                                            title="Login Screen"
                                            alt="login"
                                            className={service.img_mobile}
                                        />
                                    </div>
                                    <div className="col-sm-4 justify-content-center d-flex ">
                                        <img
                                            src={mobile_home}
                                            title="Home Screen"
                                            alt="inicio"
                                            className={service.img_mobile}
                                        />
                                    </div>
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
                                    las APIs que necesites y organizamos el
                                    contenido de forma armoniosa con los
                                    elementos de tu software.
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex row align-items-center justify-content-center">
                                <div className="col-lg-6 d-flex align-items-center justify-content-center">
                                    <img
                                        src={integracion}
                                        title="Integración de sistemas"
                                        alt="Integración de sistemas"
                                        className={service.img_integracion}
                                    />
                                </div>
                                <div className="col-lg-6 d-flex align-items-center justify-content-center">
                                    <div className="ps-4 pt-4">
                                        <h4 className="ps-4">
                                            Proceso de Implementación
                                        </h4>
                                        <ul
                                            className={service.list_empresarial}
                                        >
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
                                                Pruebas de funcionamiento
                                                cíclicas
                                            </li>
                                            <li className="list-group-item">
                                                <Check className="me-2 text-success" />
                                                Mantenciones, pruebas y
                                                validaciones
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <Contact />
            <Footer />
        </>
    );
};

export default Servicios;
