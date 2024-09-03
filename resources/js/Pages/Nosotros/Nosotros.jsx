import Header from "./../Header";
import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";

const Nosotros = () => {
    return (
        <>
            <Head>
                <title>Nosotros - Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header />
            <Contact />
            <Footer />
        </>
    );
};

export default Nosotros;
