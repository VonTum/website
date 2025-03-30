LeftClick: drag blocks
RightClick: drag screen
Scroll: zoom

A: anchor/unanchor blocks
P: Pause
O: Advance simulation by 1 tick while paused
T: divide object into triangles
C: divide object into convex parts
D: delete Object
N: start/stop object drawing
	To draw new objects, first press 'N', then start drawing your polygon, press N to finish. Only valid polygons may be drawn, so when the polygon is colored yellow it should work. 
	Press 'N' again to finish and drop you newly created object into the world

Numpad+ Numpad-: Adjust simulation speed


If the simulation is a bit laggy, you may want to reduce the amount of blocks in the pool, do this by running the jar from commandline with the correct parameters: 
	java -jar physics.jar <pool size, by default 20>

Running tests:
java -DdebugEnabled=true -DpauseEnabled=true -cp physics.jar org.junit.runner.JUnitCore physics2D.tests.GeometryTests
java -DdebugEnabled=true -DpauseEnabled=true -cp physics.jar org.junit.runner.JUnitCore physics2D.tests.MathTests
java -DdebugEnabled=true -DpauseEnabled=true -cp physics.jar org.junit.runner.JUnitCore physics2D.tests.TriangulationTests
java -DdebugEnabled=true -DpauseEnabled=true -cp physics.jar org.junit.runner.JUnitCore physics2D.tests.PhysicsTests

F1-5: toggle debug views