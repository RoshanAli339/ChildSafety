import './NavBar.css'
import logo from '../images/protection.png'
import {Link} from "react-router-dom";
export default function NavBar(){
    return(
        <nav>
            <img src={logo} alt="Image"/>
            <ul>
                <Link className="link" to="/dashboard">Dashboard</Link>
                <Link className="link" to="/history">History</Link>
                <Link className="link" to="/attendance">Attendance</Link>
            </ul>
            <button id="logout">
                Log out
            </button>
        </nav>
    )
}