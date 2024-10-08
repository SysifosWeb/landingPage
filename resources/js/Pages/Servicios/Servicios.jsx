import Header from "./../HeaderPages";
// import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";
import service from "./../../../css/servicios.module.css";

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
                                <p className="text-center">
                                    Posicionamos tu negocio en internet, y te
                                    acercamos a más clientes!, con un diseño de
                                    pagina enfocado en lo que ofreces, y con
                                    compatibilidad en la mayoria de los
                                    dispositivos del mercado
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section className="" id="aplicacionesMedida"></section>
                <section className="" id="appsMobile"></section>
            </main>
            {/* <Contact /> */}
            <Footer />
        </>
    );
};

export default Servicios;
