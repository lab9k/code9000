import React from 'react';
import { Slide } from '../components/Slider';

import verkijkerIcon from '../../../../theme/icons/verkijker.svg';

export const Slide1 = () => (
  <Slide className="Carrousel__Item">
    <div className="Carrousel__Item__Text">
      <p>Hi, my name is Bert.</p>
      <p>I LOVE birds. And I need your help.</p>
    </div>
    <img src={verkijkerIcon} alt="" className="OnBoard__Verkijker" />
  </Slide>
);

export default Slide1;
