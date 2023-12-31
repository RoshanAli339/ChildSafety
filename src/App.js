import Login from "./components/Login";
import History from "./components/History";
import Attendance from "./components/Attendance";
import Dashboard from "./components/Dashboard";
import './App.css';
import {Route, Routes} from "react-router-dom";

function App() {
  return (
      <Routes>
        <Route path="/" element={<div className="LoginApp"> <Login/> </div>} />
        <Route path="/dashboard" element={<Dashboard />} />
        <Route path="/history" element={<History />} />
        <Route path="/attendance" element={<Attendance />}/>
      </Routes>
  );
}

export default App;
