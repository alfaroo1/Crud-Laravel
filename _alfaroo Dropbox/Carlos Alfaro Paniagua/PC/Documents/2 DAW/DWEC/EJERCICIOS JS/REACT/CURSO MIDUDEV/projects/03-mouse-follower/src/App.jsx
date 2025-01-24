import './App.css'
import { useEffect,useState } from 'react';

//Componente
const FollowMouse = () =>{
  const [enabled, setEnabled] = useState(false);
  const [position,setPosition] = useState({ x:0 , y:0});
  //UseEffect
  useEffect(()=>{
    //Funcion
    const handelMove = (event) =>{
      const {clientX, clientY} = event;
      //Acutalizamos la posicion X e Y
      setPosition({x: clientX, y: clientY});
    }
    if (enabled) {
      window.addEventListener('pointermove', handelMove)
    }
    //ESTO SE EJECUTARA CUANDO DEJE DE RENDERIZARSE UN COMPONENTE Y CUANDO CAMBIE EL ESTADO DE enabled
    return () => {
      window.removeEventListener('pointermove', handelMove)
    };
    
  },[enabled])
  return (
    <>
    <main>
      <div style={{ 
        position: 'absolute',
        backgroundColor: 'rgba(0, 0, 0, 0.5)',
        border: '1px solid #fff',
        borderRadius: '50%',
        opacity: 0.8,
        pointerEvents: 'none',
        left: -25,
        top: -25,
        width: 50,
        height: 50,
        transform: `translate(${position.x}px, ${position.y}px)`
      }}>

      </div>
      <button className='button' onClick={() => setEnabled(!enabled)}>{enabled ? 'Desactivar' : 'Activar'} seguir puntero</button>
    </main>
    </>
  )
}

function App() {
  return(
    <>
    <FollowMouse></FollowMouse>
  </>
  )
}

export default App
