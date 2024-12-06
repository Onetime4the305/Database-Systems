import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import Home from './components/Home';
import Information from './components/Information';
import AddInfo from './components/addInfo'
import Dashboard from './components/dash';

function App() {
  return (
    <Router>
      <nav>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/information">Information</Link>
          </li>
          <li>
            <Link to="/addInfo">Add Info</Link>
          </li>
          <li>
            <Link to="/dash">Dashboard</Link>
          </li>
        </ul>
      </nav>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/information" element={<Information />} />
        <Route path="/addInfo" element={<AddInfo />} />
        <Route path="/dash" element={<Dashboard />} />


      </Routes>
    </Router>
  );
}

export default App;
