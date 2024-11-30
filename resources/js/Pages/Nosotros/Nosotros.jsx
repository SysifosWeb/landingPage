import Header from "../HeaderPages";
import Footer from "./../Footer";
import Contact from "./../Contact";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";
import ours from "./../../../css/nosotros.module.css";
import equipo from "./../../../img/equipoMin.webp";
import osman from "./../../../img/Osman.png";
import karen from "./../../../img/Karen.png";
import Diego from "./../../../img/Diego.png";
const Nosotros = () => {
    return (
        <>
            <Head title="Nosotros">
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header title={"Quienes Somos?"} />
            <div className="main">
                <div className="container py-5">
                    <section className={`row`} id="history-company">
                        <div className={`d-flex row pb-4`}>
                            <div
                                id="our-img"
                                className="col-12 col-lg-6 d-flex align-items-center justify-content-center pb-5"
                            >
                                <img
                                    src={equipo}
                                    height="250"
                                    width="100%"
                                    alt=""
                                />
                            </div>
                            <div
                                id="our-text"
                                className={`${ours.history_text} col-12 col-lg-6 d-flex flex-column`}
                            >
                                <h2 className="text-start">
                                    Nuestra Historia.
                                </h2>
                                <p>
                                    En SysifosWeb somos un equipo apasionado por
                                    transformar ideas en soluciones digitales
                                    innovadoras y excepcionales. Fundada en 2024
                                    por tres amigos informáticos con diversas
                                    especialidades, nuestra empresa tiene como
                                    objetivo liderar el desarrollo de software
                                    en la región de Coquimbo. Contamos con un
                                    equipo altamente capacitado y comprometido
                                    con la formación continua, lo que nos
                                    permite ofrecer soluciones de alta calidad.
                                    Nuestro talento y dedicación son la clave
                                    para superar las expectativas de nuestros
                                    clientes.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
                <section className={`${ours.profile}`} id="profile">
                    <div className="container">
                        <div
                            className={`row d-flex justify-content-center align-items-center gap-5`}
                        >
                            <div className={`${ours.card_our} col-lg-3`}>
                                <div className={`${ours.card_img}`}>
                                    <img
                                        src={osman}
                                        alt="osman"
                                        className="mb-5"
                                    />
                                </div>
                                <h4 className={`mt-5 pt-5 mb-1`}>
                                    Osman Ahumada
                                </h4>
                                <small className={`mb-3`}>
                                    Web & Mobile Developer
                                </small>
                                <p className={`text-center`}>
                                    Desarrollador web, con conocimientos en
                                    backend,frontend y desarrollo mobile en
                                    flutter
                                </p>
                            </div>
                            <div className={`${ours.card_our} col-lg-3`}>
                                <div className={ours.card_img}>
                                    <img src={karen} alt="" />
                                </div>
                                <h4 className={`mt-5 pt-5 mb-1`}>
                                    Karen Godoy
                                </h4>
                                <small className={`mb-3`}>
                                    DBA & Frontend Developer
                                </small>
                                <p className={`text-center`}>
                                    Mi especialidad son las bases de datos y el
                                    desarrollo web frontend
                                </p>
                            </div>
                            <div className={`${ours.card_our} col-lg-3`}>
                                <div className={ours.card_img}>
                                    <img src={Diego} alt="" />
                                </div>
                                <h4 className={`mt-5 pt-5 mb-1`}>
                                    Diego Araya
                                </h4>
                                <small className={`mb-3`}>
                                    Full Stack Developer
                                </small>
                                <p className={`text-center`}>
                                    Desarrollador full stack especializado en
                                    crear aplicaciones web responsivas.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <Contact />
            <Footer />
        </>
    );
};

export default Nosotros;
