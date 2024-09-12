import indexcss from "./../../css/index.module.css";
import Menu from "./Menu";
const HeaderPages = ({ title }) => {
    return (
        <header className={`shadow-sm ${indexcss.cabecera}`}>
            <Menu />

            <section
                style={{
                    display: `flex`,
                    justifyContent: `center`,
                    alignItems: `center`,
                }}
                className="container banner mt-5 px-5"
            >
                <article
                    style={{
                        display: `flex`,
                        flexDirection: `column`,
                        justifyContent: `center`,
                        alignItems: `center`,
                    }}
                    className={`text-white  pb-5  mt-5 ${indexcss.welcome}`}
                >
                    <h1 className="text-center">{title}</h1>
                </article>
            </section>
        </header>
    );
};

export default HeaderPages;
