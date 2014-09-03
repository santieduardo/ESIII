package fspoa.vagas;

public class Cidade {
	
	private int id;

	public int getId() {
		return id;
	}

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
