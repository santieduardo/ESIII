package fspoa.vagas;

import javax.swing.JOptionPane;

public class Curso {
	
	private int id;
	

	/**
	 *  Método que retorna id do curso.
	 *  
	 **/

	public int getId() {		
		
		return id;		
	}
	
	/**
	 * 
	 * Método que define o id do curso.
	 * 
	 * @param id
	 */
	
	public void setId(int id) {
		if(checkIdCurso(id)){
			this.id = id;			
		}
		else{
			this.id = 0;
		}
	}
	
	public boolean checkIdCurso(int id){
		if(id > 0){
			return true;
		}
		return false;
	}

}
