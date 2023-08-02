import { Link } from "react-router-dom";
import { useState, useEffect } from "react";
import "./Navbar.css";

// Icons
import { GiHamburgerMenu } from "react-icons/gi";
import { AiOutlineClose } from "react-icons/ai";
import { BiUser } from "react-icons/bi"; // Sign-in
import { BiHomeAlt } from "react-icons/bi"; // Home
import { BiWorld } from "react-icons/bi"; // Polyglot
import { BiPen } from "react-icons/bi"; // Blog
import { BiInfoCircle } from "react-icons/bi"; // About
import logo from "../assets/images/nomadium_logo_black.png";

const Navbar = () => {
  // Header Scroll
  const [scrollPosition, setScrollPosition] = useState(0);
  const updateScroll = () => {
    setScrollPosition(window.scrollY || document.documentElement.scrollTop);
  };
  useEffect(() => {
    window.addEventListener("scroll", updateScroll);
  });

  // Mobile Menu
  const [isOpen, setMenu] = useState(false);
  const toggleMenu = () => {
    setMenu((isOpen) => !isOpen); // Menu On & Off
  };

  return (
    <>
      {/* Navbar Desktop & Laptop */}
      <div className="navbar">
        <div className="logo">
          <Link to="/" className="logo-link">
            <img src={logo} alt="logo" />
          </Link>
        </div>
        <ul>
          <li>
            <Link to="/">
              <BiHomeAlt style={{ cursor: "pointer" }} />
            </Link>
          </li>
          <li>
            <Link to="/polyglot">
              <BiWorld style={{ cursor: "pointer" }} />
            </Link>
          </li>
          <li>
            <Link to="/blog">
              <BiPen style={{ cursor: "pointer" }} />
            </Link>
          </li>
          <li>
            <Link to="/about">
              <BiInfoCircle style={{ cursor: "pointer" }} />
            </Link>
          </li>
        </ul>
        <div className="signin-wrapper">
          <Link to="/" className="signin">
            <BiUser
              style={{
                cursor: "pointer",
                backgroundColor: "transparent",
                transform: "translateY(3px)",
              }}
            />
          </Link>
          <p>&copy; Nomadium.</p>
        </div>
      </div>

      {/* Navbar Tablet & Mobile */}
      <div className={scrollPosition < 10 ? "navbar-mobile" : "navbar-sticky"}>
        <Link to="/" className="logo-mobile">
          <img src={logo} alt="logo" />
        </Link>
        <div
          onClick={() => toggleMenu()}
          className="menu"
          style={{
            textDecoration: "none",
            color: "#202020",
            paddingRight: "20px",
            fontSize: "22px",
            transform: "translateY(3px)",
            cursor: "pointer",
          }}
        >
          <GiHamburgerMenu
            style={{ cursor: "pointer", backgroundColor: "transparent" }}
          />
        </div>
      </div>

      {/* Navbar Overlay */}
      <div className={isOpen ? "overlay__show" : "overlay__hide"}>
        <div className="overlay__close">
          <AiOutlineClose
            onClick={() => toggleMenu()}
            style={{ cursor: "pointer", backgroundColor: "transparent" }}
          />
        </div>
        <Link to="/" className="overlay__logo">
          <h1>NOMADIUM</h1>
        </Link>
        <div className="overlay__content">
          <ul className="overlay__nav">
            <li className="overlay__nav-list">
              <Link to="/" className="navLink" onClick={() => toggleMenu()}>
                <span>
                  <BiHomeAlt
                    style={{
                      cursor: "pointer",
                      backgroundColor: "transparent",
                      transform: "translateY(5px)",
                      fontSize: "22px",
                    }}
                  />
                </span>
                Home
              </Link>
            </li>
            <li className="overlay__nav-list">
              <Link
                to="/polyglot"
                className="navLink"
                onClick={() => toggleMenu()}
              >
                <span>
                  <BiWorld
                    style={{
                      cursor: "pointer",
                      backgroundColor: "transparent",
                      transform: "translateY(5px)",
                      fontSize: "22px",
                    }}
                  />
                </span>
                Polyglot
              </Link>
            </li>
            <li className="overlay__nav-list">
              <Link to="/blog" className="navLink" onClick={() => toggleMenu()}>
                <span>
                  <BiPen
                    style={{
                      cursor: "pointer",
                      backgroundColor: "transparent",
                      transform: "translateY(5px)",
                      fontSize: "22px",
                    }}
                  />
                </span>
                Blog
              </Link>
            </li>
            <li className="overlay__nav-list">
              <Link
                to="/about"
                className="navLink"
                onClick={() => toggleMenu()}
              >
                <span>
                  <BiInfoCircle
                    style={{
                      cursor: "pointer",
                      backgroundColor: "transparent",
                      transform: "translateY(5px)",
                      fontSize: "22px",
                    }}
                  />
                </span>
                About
              </Link>
            </li>
            <li style={{ listStyle: "none" }}>
              <Link
                to="/"
                style={{ fontWeight: 700, backgroundColor: "transparent" }}
                className="navLink"
                onClick={() => toggleMenu()}
              >
                <span
                  style={{
                    backgroundColor: "transparent",
                    marginRight: "8px",
                  }}
                >
                  <BiUser
                    style={{
                      cursor: "pointer",
                      backgroundColor: "transparent",
                      transform: "translateY(5px)",
                      fontSize: "22px",
                    }}
                  />
                </span>
                Sign In
              </Link>
            </li>
          </ul>
        </div>
      </div>
    </>
  );
};

export default Navbar;
