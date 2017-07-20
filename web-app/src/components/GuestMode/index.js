import React from 'react';
import { Link } from 'react-router-dom';

import './GuestMode.css';
import logo from '../../theme/crest.svg';
import classNames from '../../utils/classNames';

const GuestMode = ({ children, className }) => {
  return (
    <div className={classNames('GuestMode', className)}>
      <div className="GuestMode__Wrapper">
        <img src={logo} alt="CODE9000 crest" className="Login__Logo" />
        {children}
      </div>
    </div>
  );
};

export const GoBack = () => {
  return (
    <div className="GuestMode__GoBack"><Link to="/login">Go back</Link></div>
  );
};

export default GuestMode;
