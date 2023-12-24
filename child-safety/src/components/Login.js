import './login.css'


function Form(){
    return(
        <form className="loginForm" autoComplete="false">
            <input
                required
                className="inputField"
                type="text"
                placeholder="Username"
            />
            <input
                required
                className="inputField"
                type="password"
                placeholder="Password"
            />
            <button type="submit" className="submitBtn">
                Login
            </button>
        </form>
    )
}


export default function Login(){
    return(
        <div className="container">
            <h1 className="heading">Login</h1>
            <Form />
        </div>
    )
}