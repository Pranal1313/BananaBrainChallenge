import React, { useState } from "react";
import { useNavigate } from "react-router-dom";

const Signup = () => {
  const [username, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  const handleSignup = async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append("signup", true);
    formData.append("txt", username);
    formData.append("email", email);
    formData.append("pswd", password);

    const response = await fetch(
      "http://localhost/BananaBrainChallenge/backend/auth.php",
      {
        method: "POST",
        body: formData,
      }
    );

    const text = await response.text();

    if (text.includes("Signup successful")) {
      alert("Signup successful! Please login.");
      navigate("/");
    } else if (text.includes("Email already exists")) {
      alert("Email already exists! Please login.");
      navigate("/");
    } else {
      alert("Error signing up. Try again.");
    }
  };

  return (
    <div style={{ textAlign: "center", marginTop: "50px", fontFamily: "Arial" }}>
      <h2>Sign Up</h2>
      <form onSubmit={handleSignup}>
        <input
          type="text"
          placeholder="Username"
          value={username}
          onChange={(e) => setUsername(e.target.value)}
          required
        /><br /><br />
        <input
          type="email"
          placeholder="Email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          required
        /><br /><br />
        <input
          type="password"
          placeholder="Password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          required
        /><br /><br />
        <button type="submit">Sign Up</button>
      </form>
      <p>
        Already have an account? <a href="/">Login</a>
      </p>
    </div>
  );
};

export default Signup;
