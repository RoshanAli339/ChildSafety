import './login.css'
import {users} from '../data/users'
import {useState} from "react";
import {useNavigate} from "react-router-dom";

function Form(){

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [isError, setIsError] = useState(false);
    const navigate = useNavigate();
    async function handleSubmit(e){
        e.preventDefault();
        try{
            await submitForm({"email": email, "password": password});
            localStorage.setItem("login", "true")
            navigate('/dashboard')
        }
        catch (err){
            setIsError(true);
        }
    }

    return(
        <form className="loginForm" autoComplete="false" method="post" onSubmit={handleSubmit}>
            <input
                required
                className="inputField"
                type="email"
                placeholder="Email"
                value={email}
                name="email"
                onChange={e => setEmail(e.target.value)}
            />
            <input
                required
                className="inputField"
                type="password"
                placeholder="Password"
                value={password}
                name="password"
                onChange={e => setPassword(e.target.value)}
            />
            {isError && <p className="error">Invalid email or password! Please try again!</p>}
            <button type="submit" className="submitBtn" disabled={email.length === 0 || password.length === 0}>
            Login
            </button>
        </form>
    )
}

function submitForm(credentials){
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let check = users.find(x =>
                x.email===credentials.email && x.password===credentials.password)
            if (check === undefined){
                reject(new Error("Invalid username or password! Please try again!"));
            } else{
                resolve();
            }
        }, 1500);
    })
}


export default function Login(){
    return(
        <div className="container">
            <h1 className="heading">Login</h1>
            <Form />
        </div>
    )
}