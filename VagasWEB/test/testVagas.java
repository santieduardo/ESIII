import static org.junit.Assert.assertEquals;

import org.junit.Test;

import fspoa.vagas.Curso;

public class testVagas {

	/**
	 * 
	 * Teste que verifica se o ID do curso está de acordo com o pesquisado.
	 * 
	 */

	@Test
	public void testIdCurso() {

		Curso curso = new Curso();

		curso.setId(34);

		assertEquals(34, curso.getId());

		curso.setId(1);

		assertEquals(1, curso.getId());

	}

	/**
	 * Teste que verifica se o ID do curso e ID da cidade está de acordo com o
	 * pesquisado.
	 * 
	 */

	@Test
	public void testCursoIdCidadeId() {

		Curso curso = new Curso();

		Cidade cidade = new Cidade();

		curso.setId(1);

		cidade.setId(35);
		
		assertEquals(35, cidade.getId());

		assertEquals(1, curso.getId());

	}
	
	@Test
	public void testCursoNegativo(){
		Curso curso = new Curso();
		curso.setId(-15);
		
		assertEquals(0, curso.getId());
	}

}
