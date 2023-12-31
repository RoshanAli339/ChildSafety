import NavBar from "./NavBar";
import Maps from "./Maps";

const contentStyle = {
    width: "100%",
    height: "100vh",
    display: "flex",
    flexDirection: "column",
    justifyContent: "center",
    alignItems: "center",
    fontFamily: "Poppins, sans-serif",
}

export default function Dashboard(){
    return(
        <>
            <NavBar/>
            <div id="content" style={contentStyle}>
                <h1>Live Location:</h1>
                <Maps/>
            </div>
        </>
    )
}