import { Navbar, Nav, Form, FormControl, Container } from "react-bootstrap"
// import logo from '../images/logo.png';
import '../css/components/Header.css';


export const Header = () => (            
    <Navbar collapseOnSelect className='navbar' expand='md'>
        <Container>
            <Navbar.Brand href="/">
            </Navbar.Brand>
            <Navbar.Toggle aria-controls='responsive-navbar-nav'/>
            <Navbar.Collapse id='responsive-navbar-nav'>
                <Nav className='me-auto'>
                    <Nav.Link href='/'>Home</Nav.Link>
                    <Nav.Link href='/shop'>Shop</Nav.Link>
                    <Nav.Link href='/news'>News</Nav.Link>
                    <Nav.Link href='/authors'>Authors</Nav.Link>
                </Nav>
                <Form className='d-flex'>
                    <FormControl 
                        type='text'
                        placeholder='Search'
                        className='me-2'
                    />
                </Form>
                <Nav>
                <Nav.Link href='/login'>Login</Nav.Link>
                </Nav>
            </Navbar.Collapse>
        </Container>
    </Navbar>
)
