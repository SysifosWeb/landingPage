import Header from "./../HeaderPages";
import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";

const Servicios = () => {
    return (
        <>
            <Head>
                <title>Servicios | Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header title={"Nuestros Servicios"} />
            <Contact />
            <Footer />
        </>
    );
};

export default Servicios;
