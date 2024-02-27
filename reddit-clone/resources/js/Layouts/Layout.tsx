import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";
import {
    Avatar,
    Button,
    Dropdown,
    DropdownItem,
    DropdownMenu,
    DropdownTrigger,
    Input,
    Navbar,
    NavbarContent,
} from "@nextui-org/react";

export default (page: any) => {
    return (
        <>
            <Navbar>
                <NavbarContent justify="start">
                    <Link href="/" className="flex">
                        <ApplicationLogo className="rounded-full max-h-[1.5rem] mr-2"></ApplicationLogo>
                        <p className="hidden sm:block font-bold text-black">
                            BLC
                        </p>
                    </Link>
                </NavbarContent>
                <NavbarContent as="div" className="items-center" justify="end">
                    <Input
                        classNames={{
                            base: "max-w-full sm:max-w-[10rem] h-10",
                            input: "text-small border-0 !ring-transparent",
                        }}
                        placeholder="Type to search..."
                        size="sm"
                        startContent={
                            <span className="material-symbols-rounded">
                                search
                            </span>
                        }
                        type="search"
                    />
                    {page.props.auth.user ? (
                        <Dropdown placement="bottom-end">
                            <DropdownTrigger>
                                <Avatar
                                    isBordered
                                    as="button"
                                    className="transition-transform"
                                    name="Jason Hughes"
                                    size="sm"
                                    src="/assets/icon-b-bg-x-mas.png"
                                />
                            </DropdownTrigger>
                            <DropdownMenu
                                aria-label="Profile Actions"
                                variant="flat"
                            >
                                <DropdownItem
                                    key="profile"
                                    className="h-14 gap-2"
                                >
                                    <p className="font-semibold">
                                        Signed in as
                                    </p>
                                    <p className="font-semibold">
                                        zoey@example.com
                                    </p>
                                </DropdownItem>
                                <DropdownItem key="settings">
                                    <Link
                                        href={route(
                                            "profile.edit",
                                            page.props.auth.user.id,
                                        )}
                                    >
                                        Profile
                                    </Link>
                                </DropdownItem>
                                <DropdownItem key="logout" color="danger">
                                    <Link href={route("logout")} method="post">
                                        Log Out
                                    </Link>
                                </DropdownItem>
                            </DropdownMenu>
                        </Dropdown>
                    ) : (
                        <Button href={route("login")} as={Link}>
                            Log in
                        </Button>
                    )}
                </NavbarContent>
            </Navbar>
            {page}
        </>
    );
};
